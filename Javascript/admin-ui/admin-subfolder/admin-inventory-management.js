function initAdminInventoryManagement() {
  console.log('My Account page initialized ✅');

  //=====================Open modal Full Iventory====================//
  document.querySelectorAll('#inventory-body tr').forEach(row => {
    row.addEventListener('click', () => {
      document.getElementById('inventory-detail').classList.add('active');
    });
  });
  document.querySelectorAll('.close-modal-detail').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('inventory-detail').classList.remove('active');
    });
  });

  const caretWrapper = document.querySelector('.monthly-wrapper-caret-down');
  const caretButton = caretWrapper.querySelector('.inventory-management-caret-button');
  const selectedPeriod = caretWrapper.querySelector('.selected-period');
  const dropdownItems = caretWrapper.querySelectorAll('.monthly-dropdown-item');

  // Toggle dropdown visibility
  caretButton.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent click from closing dropdown immediately
    caretWrapper.classList.toggle('active');
  });

  // Handle dropdown item clicks
  dropdownItems.forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      const newValue = item.textContent.trim();
      selectedPeriod.textContent = newValue; // Update button text
      caretWrapper.classList.remove('active'); // Close dropdown
    });
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!caretWrapper.contains(e.target)) {
      caretWrapper.classList.remove('active');
    }
  });


  // Select elements
const addStockBtn = document.querySelector('.add-inventory-btn');
const modalContainer = document.getElementById('add-stock-modal-container-id');
const closeStockBtn = document.querySelectorAll('.add-stock-button-id');
const addBtn = document.querySelector('.add-stock-btn');

// When the Add Stock button is clicked → open the modal
addStockBtn.addEventListener('click', () => {
  modalContainer.classList.add('active');
});

// Loop through all close buttons and add event listeners
closeStockBtn.forEach(button => {
  button.addEventListener('click', () => {
    modalContainer.classList.remove('active');  // Close the modal
  });
});

// Optional: Close the modal when clicking outside of it
window.addEventListener('click', (e) => {
  if (e.target === modalContainer) {
    modalContainer.classList.remove('active');
  }
});

// Handle the Add Stock button click
addBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const itemName = document.getElementById('ItemName').value;
  const itemID = document.getElementById('ItemID').value;
  const itemQuantity = document.getElementById('ItemQuantity').value;
  const itemUnit = document.getElementById('ItemUnit').value;
  const purchaseDate = document.getElementById('Purchase').value;
  const expiryDate = document.getElementById('ExpiryDate').value;

  if (!itemName || !itemID || !itemQuantity || !itemUnit || !purchaseDate || !expiryDate) {
    showToast('Please fill in all required fields.');
    return;
  } else {
    showToast('Stock added successfully!');
    // Delay the modal close, logging, and field clearing by 3 seconds
    setTimeout(() => {
      // Log the data (for testing; replace with actual submission logic)
      console.log('Adding stock:', {
        itemName,
        itemID,
        itemQuantity,
        itemUnit,
        purchaseDate,
        expiryDate
      });

      modalContainer.classList.remove('active');  // Close the modal after delay
      // Optional: Clear the form fields after adding
      document.getElementById('ItemName').value = '';
      document.getElementById('ItemID').value = '';
      document.getElementById('ItemUnit').value = '';
      document.getElementById('Purchase').value = '';
      document.getElementById('ExpiryDate').value = '';
    }, 3000);  // 3000ms = 3 seconds delay
  }
});

// Toast function
function showToast(message) {
  const toast = document.getElementById('toast');
  toast.textContent = message;  // Set the message
  toast.classList.add('show');  // Show the toast
  // Auto-hide after 3 seconds
  setTimeout(() => {
    toast.classList.remove('show');
  }, 3000);  // 3000ms = 3 seconds; adjust as needed
}

}

document.addEventListener('DOMContentLoaded', initAdminInventoryManagement);
