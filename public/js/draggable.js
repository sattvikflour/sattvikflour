// const sortableList = document.querySelector(".sortable-list");
// const items = sortableList.querySelectorAll(".item");

// items.forEach(item => {
//     item.addEventListener("dragstart", () => {
//         // Adding dragging class to item after a delay
//         setTimeout(() => item.classList.add("dragging"), 0);
//     });
//     // Removing dragging class from item on dragend event
//     item.addEventListener("dragend", () => item.classList.remove("dragging"));
// });

// const initSortableList = (e) => {
//     e.preventDefault();
//     const draggingItem = document.querySelector(".dragging");
//     // Getting all items except currently dragging and making array of them
//     let siblings = [...sortableList.querySelectorAll(".item:not(.dragging)")];

//     // Finding the sibling after which the dragging item should be placed
//     let nextSibling = siblings.find(sibling => {
//         return e.clientY <= sibling.offsetTop + sibling.offsetHeight / 2;
//     });

//     // Inserting the dragging item before the found sibling
//     sortableList.insertBefore(draggingItem, nextSibling);
// }

// sortableList.addEventListener("dragover", initSortableList);
// sortableList.addEventListener("dragenter", e => e.preventDefault());




//********************************* */


    const sortableList = document.querySelector(".sortable-list");
    const items = sortableList.querySelectorAll(".item");

    items.forEach(item => {
        item.addEventListener("dragstart", () => {
            // Adding dragging class to item after a delay
            setTimeout(() => item.classList.add("dragging"), 0);
        });

        // Removing dragging class from item on dragend event
        item.addEventListener("dragend", () => {
            item.classList.remove("dragging");
            // Update the numbers after the drag-and-drop is complete
            updateNumbers();
        });
    });

    const initSortableList = (e) => {
        e.preventDefault();
        const draggingItem = document.querySelector(".dragging");

        // Getting all items except currently dragging
        const siblings = [...sortableList.querySelectorAll(".item:not(.dragging)")];

        // Finding the sibling after which the dragging item should be placed
        const nextSibling = siblings.find(sibling => {
            return e.clientY <= sibling.offsetTop + sibling.offsetHeight / 2;
        });

        // Inserting the dragging item before the found sibling
        sortableList.insertBefore(draggingItem, nextSibling);

        // Update the numbers during the drag-and-drop process
        updateNumbers();
    };

    const updateNumbers = () => {
        const items = sortableList.querySelectorAll(".item");
        items.forEach((item, index) => {
            const numberSpan = item.querySelector(".display_order");
            numberSpan.textContent = index + 1;
        });
    };

    sortableList.addEventListener("dragover", initSortableList);
    sortableList.addEventListener("dragenter", e => e.preventDefault());
