$('.card').click((event) => {
    var obj = event.currentTarget;
    console.log(obj);
    if (obj.dataset.info == 'correct') {
        $(obj).children()[1].style.backgroundColor = 'red';
    } else {
        $(obj).children()[1].style.backgroundColor = 'green';
    }
})

$(document).ready(() => {
    interact('.img-drag').dropzone({
        accept: '#tri',
        overlap: 0.75,
        ondropactivate: function(event) {
            // add active dropzone feedback
            event.target.classList.add('drop-active')
        },
        ondragenter: function(event) {
            var draggableElement = event.relatedTarget
            var dropzoneElement = event.target

            // feedback the possibility of a drop
            dropzoneElement.classList.add('drop-target')
            draggableElement.classList.add('can-drop')
            draggableElement.textContent = 'Dragged in'
        },
        ondragleave: function(event) {
            // remove the drop feedback style
            event.target.classList.remove('drop-target')
            event.relatedTarget.classList.remove('can-drop')
            event.relatedTarget.textContent = 'Dragged out'
        },
        ondrop: function(event) {
            event.relatedTarget.textContent = 'Dropped'
        },
        ondropdeactivate: function(event) {
            // remove active dropzone feedback
            event.target.classList.remove('drop-active')
            event.target.classList.remove('drop-target')
        }
    })

    interact('.drag-drop')
        .draggable({
            inertia: true,
            modifiers: [
                interact.modifiers.restrictRect({
                    restriction: 'parent',
                    endOnly: true
                })
            ],
            autoScroll: true,
            // dragMoveListener from the dragging demo above
            onmove: dragMoveListener
        })
});

window.dragMoveListener = dragMoveListener