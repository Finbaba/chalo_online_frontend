
@section('content')

@extends('webapp.layouts.app')
<div class="fullbox">
@push('styles')
<link rel="stylesheet" href="../frontend/profile.css" />
@endpush
@if(request()->routeIs('profile'))
<header class="profile-header">
    <div class="innerwapperbox">
    <div class="header-content">
        <h1>Hey! 9362485155</h1>
      



        <div class="wallet-info">
    <i class="bi bi-wallet2"></i>
    <span> ₹{{ number_format($totalRewardAmount, 0) }}</span>
</div>



    </div>
    </div>
</header>
@endif

<div class="innerwapperbox">
    <div class="action-grid profilebx">
        <!-- Orders Button -->
        <div class="action-item">
            <a href="{{ route('order-history') }}" class="action-btn">
                <i class="bi bi-box-seam"></i>
                <span>Orders</span>
            </a>
        </div>
        
        <!-- Wishlist Button -->
        <div class="action-item">
            <a href="{{ route('wishlist') }}" class="action-btn">
                <i class="bi bi-heart"></i>
                <span>Wishlist</span>
            </a>
        </div>
        
        <!-- Coupons Button -->
        <div class="action-item">
            <a href="{{ route('coupons') }}" class="action-btn">
                <i class="bi bi-gift"></i>
                <span>Coupons</span>
            </a>
        </div>
        
        <!-- Help Center Button -->
        <div class="action-item">
            <button class="action-btn" onclick="openHelpCenter()">
                <i class="bi bi-question-circle"></i>
                <span>Help Center</span>
            </button>
        </div>
        
        <!-- Scratch Button -->
        <div class="action-item">
            <a href="{{ route('scratch_cards') }}" class="action-btn">
                <i class="bi bi-envelope-paper-fill"></i>
                <span>Scratch Cards</span>
            </a>
        </div>
    </div>
  
    <div class="profile-settings referralbox">
        <div class="referral-section">
            <h6>Refer the app</h6>

           <div class="referral-container">
  <button class="referral-btn" id="referralBtn">
    <div class="code-box">AAKSQU</div>
    <div class="share-box">
      <svg viewBox="0 0 24 24" width="50" height="20">
        <path fill="currentColor" d="M18 16c-.8 0-1.4.4-2 .8l-7-4.2c.1-.2.1-.5.1-.7s0-.5-.1-.7l7-4.2c.5.4 1.2.8 2 .8 1.7 0 3-1.3 3-3s-1.3-3-3-3-3 1.3-3 3c0 .2 0 .5.1.7l-7 4.2c-.5-.4-1.2-.8-2-.8-1.7 0-3 1.3-3 3s1.3 3 3 3c.8 0 1.4-.4 2-.8l7 4.2c-.1.2-.1.4-.1.7 0 1.7 1.3 3 3 3s3-1.3 3-3-1.3-3-3-3z"/>
      </svg>
    </div>
  </button>

  <div class="share-dropdown" id="shareDropdown">
    <div class="share-item" onclick="shareVia('whatsapp')">
      <img src="https://cdn-icons-png.flaticon.com/512/3670/3670051.png" alt="WhatsApp">
      <span>WhatsApp</span>
    </div>
    <div class="share-item" onclick="shareVia('facebook')">
      <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
      <span>Facebook</span>
    </div>
    <div class="share-item" onclick="shareVia('twitter')">
      <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
      <span>Twitter</span>
    </div>
    <div class="share-item" onclick="shareVia('instagram')">
      <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram">
      <span>Instagram</span>
    </div>
    <div class="share-item" onclick="shareVia('telegram')">
      <img src="https://cdn-icons-png.flaticon.com/512/2111/2111644.png" alt="Telegram">
      <span>Telegram</span>
    </div>
    <div class="share-item" onclick="shareVia('email')">
      <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email">
      <span>Email</span>
    </div>
    <div class="share-item" onclick="shareVia('sms')">
      <img src="https://cdn-icons-png.flaticon.com/512/3059/3059518.png" alt="SMS">
      <span>Message</span>
    </div>
    <div class="share-item" onclick="shareVia('copy')">
      <img src="https://cdn-icons-png.flaticon.com/512/3914/3914261.png" alt="Copy">
      <span>Copy Link</span>
    </div>
  </div>
</div>
</div>


        
        </div>
        
        <div class="settings-list">
            <p class="section-title">Account Settings</p>
            <!-- <div class="setting-item" onclick="goToEditProfile()">
                <span>Edit Profile</span>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div> -->
            <div class="setting-item" onclick="goToSavedAddress()">
                <span>Edit Profile</span>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div>

            
            <div class="setting-item" onclick="goToSavedAddress()">
                <span>Saved Address</span>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div> 
            
            <p class="section-title">Feedback and Information</p>
            <div class="setting-item">
                <a href="{{ route('terms-policies') }}">Terms, Policies and Licences</a>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div>
            <div class="setting-item">
                <a href="{{ route('faqs') }}">Browse FAQs</a>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div>
            <div class="setting-item">
                <a href="{{ route('consent-management') }}">Consent Management</a>
                <span class="arrow"><i class="bi bi-chevron-right"></i></span>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="logout-section">
        <a href="{{ route('admin') }}">
            <button class="logout-btn" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </a>
        </div>
    </div>
</div>

<!-- Help Center Pop-up -->
<div id="helpCenterPopup" class="help-popup">
    <h5>Contact Us</h5>
    <button class="popup-btn whatsapp-btn">
        <i class="bi bi-whatsapp"></i> WhatsApp
    </button>
    <button class="popup-btn email-btn">
        <i class="bi bi-envelope"></i> Email
    </button>
    <button class="popup-btn call-btn">
        <i class="bi bi-telephone"></i> Call
    </button>
</div>


<!-- Edit Profile Popup -->
<div id="editProfilePopup" class="edit-profile-popup">
    <div class="popup-content">
        <div class="popup-header">
            <h3>Edit Profile</h3>
            <button class="close-btn" onclick="closeEditProfile()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="popup-body">
            <div class="form-group">
                <label for="profileName">Name</label>
                <input type="text" id="profileName" placeholder="Enter Name">
                <div id="nameError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="profileEmail">Email</label>
                <input type="email" id="profileEmail" placeholder="Enter Email">
                <div id="emailError" class="error-message"></div>
            </div>
        </div>
        <div class="popup-footer">
            <button class="save-btn" onclick="saveProfile()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Save
            </button>
            <button class="cancel-btn" onclick="closeEditProfile()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                Cancel
            </button>
        </div>
    </div>
</div>
@include('webapp.layouts.footer')
@endsection







@push('scripts')

<script>
const referralBtn = document.getElementById('referralBtn');
const shareDropdown = document.getElementById('shareDropdown');

// Toggle share dropdown
referralBtn.addEventListener('click', function(e) {
  e.stopPropagation();
  shareDropdown.style.display = shareDropdown.style.display === 'flex' ? 'none' : 'flex';
});

// Close dropdown when clicking outside
document.addEventListener('click', function() {
  shareDropdown.style.display = 'none';
});

// Share functionality
function shareVia(method) {
  const referralCode = 'AAKSQU';
  const appLink = 'https://play.google.com/store/apps/details?id=com.example.app';
  const shareText = `Use my referral code ${referralCode} to join! Download the app: ${appLink}`;
  
  switch(method) {
    case 'whatsapp':
      window.open(`https://wa.me/?text=${encodeURIComponent(shareText)}`, '_blank');
      break;
    case 'facebook':
      window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(appLink)}&quote=${encodeURIComponent(shareText)}`, '_blank');
      break;
    case 'twitter':
      window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}&url=${encodeURIComponent(appLink)}`, '_blank');
      break;
    case 'instagram':
      // Instagram doesn't support direct sharing, this will open the app
      window.open(`https://www.instagram.com/`, '_blank');
      break;
    case 'telegram':
      window.open(`https://t.me/share/url?url=${encodeURIComponent(appLink)}&text=${encodeURIComponent(shareText)}`, '_blank');
      break;
    case 'email':
      window.open(`mailto:?subject=Join me!&body=${encodeURIComponent(shareText)}`, '_blank');
      break;
    case 'sms':
      window.open(`sms:?body=${encodeURIComponent(shareText)}`, '_blank');
      break;
    case 'copy':
      navigator.clipboard.writeText(shareText)
        .then(() => alert('Referral link copied to clipboard!'))
        .catch(() => alert('Failed to copy'));
      break;
  }
  
  shareDropdown.style.display = 'none';
}
</script>
<script>
function openHelpCenter() {
    document.getElementById('helpCenterPopup').style.display = 'block';
}

function goToEditProfile() {
    window.location.href = '/edit-profile';
}

function goToSavedAddress() {
   window.location.href = "{{ route('address') }}";
}

function logout() {
    // Add your logout functionality here
    window.location.href = '/logout';
}

// Close popup when clicking outside
window.addEventListener('click', function(e) {
    if (e.target === document.getElementById('helpCenterPopup')) {
        document.getElementById('helpCenterPopup').style.display = 'none';
    }
});
</script>




<script>
// Your existing JavaScript remains the same
function goToEditProfile() {
    document.getElementById('editProfilePopup').style.display = 'flex';
}

function closeEditProfile() {
    document.getElementById('editProfilePopup').style.display = 'none';
    clearErrors();
}

function clearErrors() {
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('profileName').classList.remove('error');
    document.getElementById('profileEmail').classList.remove('error');
}

function validateForm() {
    let isValid = true;
    const name = document.getElementById('profileName').value.trim();
    const email = document.getElementById('profileEmail').value.trim();
    
    clearErrors();
    
    if (name === '') {
        document.getElementById('nameError').textContent = 'Name is required';
        document.getElementById('profileName').classList.add('error');
        isValid = false;
    }
    
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required';
        document.getElementById('profileEmail').classList.add('error');
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email';
        document.getElementById('profileEmail').classList.add('error');
        isValid = false;
    }
    
    return isValid;
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function saveProfile() {
    if (!validateForm()) {
        return;
    }
    
    const name = document.getElementById('profileName').value;
    const email = document.getElementById('profileEmail').value;
    
    localStorage.setItem('profileName', name);
    localStorage.setItem('profileEmail', email);
    
    closeEditProfile();
    alert('Profile updated successfully!');
}

document.getElementById('editProfilePopup').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditProfile();
    }
});

window.addEventListener('DOMContentLoaded', function() {
    const savedName = localStorage.getItem('profileName');
    const savedEmail = localStorage.getItem('profileEmail');
    
    if (savedName) document.getElementById('profileName').value = savedName;
    if (savedEmail) document.getElementById('profileEmail').value = savedEmail;
});
</script>
@endpush