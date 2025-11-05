function initAdminAddNew() {
  document.querySelectorAll(".add-user-btn").forEach(button => {
    button.addEventListener("click", () => {
      const type = button.dataset.type;
      const modalPage = button.dataset.page;
      loadAddNewModal(modalPage, type);
    });
  });

  function loadAddNewModal(pageUrl, type) {
    fetch(pageUrl)
      .then(res => res.text())
      .then(html => {
        const existingModal = document.getElementById("add-new-modal-container-id");
        if (existingModal) existingModal.remove();

        document.body.insertAdjacentHTML("beforeend", html);

        const modalContainer = document.getElementById("add-new-modal-container-id");
        const specializationField = modalContainer.querySelector(".specialization-wrapper");

        if (type === "dentist") {
          specializationField.style.display = "block";
        } else {
          specializationField.style.display = "none";
        }

        modalContainer.classList.add("active");

        modalContainer.querySelector("#add-new-close-modal-btn").addEventListener("click", () => {
          modalContainer.remove();
        });

        modalContainer.querySelector(".add-new-cancel-button").addEventListener("click", () => {
          modalContainer.remove();
        });
      });
  }
}


document.addEventListener('DOMContentLoaded', initAdminAddNew);