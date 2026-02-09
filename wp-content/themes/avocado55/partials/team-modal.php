<?php
/**
 * Team Member Modal Partial
 * 
 * Displays the modal for viewing team member details.
 * Include this partial on any page that needs to display team member modals.
 * 
 * Elements that trigger the modal should have:
 * - class="team-card" (or any class that matches the JS selector)
 * - data-member-id, data-name, data-role, data-image, data-phone, data-email, data-linkedin, data-content
 */
?>

<!-- Team Member Modal -->
<div id="team-modal" class="team-modal fixed inset-0 z-50 hidden">
  <!-- Backdrop -->
  <div class="team-modal-backdrop absolute inset-0 bg-black/60"></div>
  
  <!-- Modal Content -->
  <div class="team-modal-container absolute inset-0 flex items-center justify-center p-4 lg:p-8">
    <div class="team-modal-content relative bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
      
      <!-- Close Button -->
      <button type="button" class="team-modal-close absolute top-4 right-4 w-10 h-10 rounded-full bg-brand-green flex items-center justify-center hover:bg-brand-cta transition-colors z-10">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
      
      <div class="p-6 lg:p-8">
        <!-- Top Section: Image & Info -->
        <div class="flex flex-col md:flex-row gap-6 mb-8">
          <!-- Image -->
          <div class="w-full md:w-64 flex-shrink-0">
            <div class="aspect-[3/4] rounded-lg overflow-hidden bg-gray-100">
              <img id="modal-image" src="" alt="" class="w-full h-full object-cover" />
            </div>
          </div>
          
          <!-- Info -->
          <div class="flex-grow">
            <h3 id="modal-name" class="text-2xl lg:text-3xl font-semibold text-brand-green mb-2"></h3>
            <p id="modal-role" class="text-gray-600 mb-6"></p>
            
            <!-- Contact Info -->
            <div id="modal-contact" class="space-y-2 mb-4">
              <p id="modal-phone" class="text-gray-700"></p>
              <a id="modal-email" href="" class="block text-brand-green hover:underline"></a>
            </div>
            
            <!-- LinkedIn -->
            <div id="modal-linkedin-container" class="hidden">
              <a id="modal-linkedin" href="" target="_blank" rel="noopener" class="inline-flex items-center justify-center w-10 h-10 border border-gray-300 rounded hover:border-brand-green transition-colors">
                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Content -->
        <div id="modal-content" class="prose prose-gray max-w-none text-gray-600 leading-relaxed"></div>
      </div>
    </div>
  </div>
</div>

<script>
(function() {
  // Only initialize once
  if (window.teamModalInitialized) return;
  window.teamModalInitialized = true;
  
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('team-modal');
    if (!modal) return;
    
    const modalBackdrop = modal.querySelector('.team-modal-backdrop');
    const modalClose = modal.querySelector('.team-modal-close');
    
    // Open modal on team-card click
    document.querySelectorAll('.team-card').forEach(card => {
      card.addEventListener('click', function() {
        const data = this.dataset;
        
        // Populate modal
        document.getElementById('modal-image').src = data.image || '';
        document.getElementById('modal-image').alt = data.name || '';
        document.getElementById('modal-name').textContent = data.name || '';
        document.getElementById('modal-role').textContent = data.role || '';
        
        // Phone
        const phoneEl = document.getElementById('modal-phone');
        if (data.phone) {
          phoneEl.textContent = data.phone;
          phoneEl.classList.remove('hidden');
        } else {
          phoneEl.classList.add('hidden');
        }
        
        // Email
        const emailEl = document.getElementById('modal-email');
        if (data.email) {
          emailEl.textContent = data.email;
          emailEl.href = 'mailto:' + data.email;
          emailEl.classList.remove('hidden');
        } else {
          emailEl.classList.add('hidden');
        }
        
        // LinkedIn
        const linkedinContainer = document.getElementById('modal-linkedin-container');
        const linkedinEl = document.getElementById('modal-linkedin');
        if (data.linkedin) {
          linkedinEl.href = data.linkedin;
          linkedinContainer.classList.remove('hidden');
        } else {
          linkedinContainer.classList.add('hidden');
        }
        
        // Content
        document.getElementById('modal-content').innerHTML = data.content || '';
        
        // Show modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });
    });
    
    // Close modal function
    function closeModal() {
      modal.classList.add('hidden');
      document.body.style.overflow = '';
    }
    
    modalBackdrop.addEventListener('click', closeModal);
    modalClose.addEventListener('click', closeModal);
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeModal();
      }
    });
  });
})();
</script>
