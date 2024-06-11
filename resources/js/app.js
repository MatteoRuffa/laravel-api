import "./bootstrap";
import "~resources/scss/app.scss";

// import "~bootstrap-icons/font/bootstrap-icons.scss";

import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// const deleteSubmitButtons = document.querySelectorAll(".delete-button");

// deleteSubmitButtons.forEach((button) => {
//     button.addEventListener("click", (event) => {
//         event.preventDefault();

//         const dataTitle = button.getAttribute("data-item-title");

//         const modal = document.getElementById("deleteModal");

//         const bootstrapModal = new bootstrap.Modal(modal);
//         bootstrapModal.show();

//         const modalItemTitle = modal.querySelector("#modal-item-title");
        
//         modalItemTitle.textContent = dataTitle;

//         const buttonDelete = modal.querySelector("button.btn-danger");

//         buttonDelete.addEventListener("click", () => {
//             button.parentElement.submit();
//         });
//     });
// });

const deleteSubmitButtons = document.querySelectorAll(".delete-button");

deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute("data-item-title");
        const elementId = button.getAttribute("data-item-id");
        const elementName = button.getAttribute("data-item-name");

        const modal = document.getElementById("deleteModal");
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;

        const deleteForm = modal.querySelector("#delete-form");
        deleteForm.action = `/admin/${elementName}s/${elementId}`;

        const buttonDelete = modal.querySelector("button.btn-danger");

        buttonDelete.addEventListener("click", () => {
            deleteForm.submit();
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const modalInfo = new bootstrap.Modal(document.getElementById('staticBackdropInfo'));

    document.querySelectorAll('.open-modal-info').forEach(function(button) {
        button.addEventListener('click', function(event) {
            const data = {
                id: this.dataset.id,
                title: this.dataset.title,
                description: this.dataset.description,
                created: this.dataset.created,
                color: this.dataset.color,
                icon: this.dataset.icon,
                categories: this.dataset.categories
            };

            for (const [key, value] of Object.entries(data)) {
                const modalField = document.getElementById(`modal${key.charAt(0).toUpperCase() + key.slice(1)}Info`);
                if (modalField && value) {
                    if (key === 'icon') {
                        modalField.className = `modalIconInfo ${value}`;
                        modalField.style.display = 'block';
                    } else {
                        modalField.innerHTML = `<strong>${key.charAt(0).toUpperCase() + key.slice(1)}:</strong> ${value}`;
                        modalField.style.display = 'block';
                    }
                } else if (modalField) {
                    modalField.style.display = 'none';
                }
            }

            modalInfo.show();
        });
    });
});




const image = document.getElementById("uploadImage");

//se esiste nella pagina
if (image) {
    image.addEventListener("change", () => {
        //console.log(image.files[0]);
        //prendo l'elemento ing dove voglio la preview
        const preview = document.getElementById("uploadPreview");

        //creo nuoco oggetto file reader
        const oFReader = new FileReader();

        //uso il metodo readAsDataURL dell'oggetto creato per leggere il file
        oFReader.readAsDataURL(image.files[0]);

        //al termine della lettura del file
        oFReader.onload = function (event) {
            //metto nel src della preview l'immagine
            preview.src = event.target.result;
        };
    });
}



