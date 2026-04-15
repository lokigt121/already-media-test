document.addEventListener('DOMContentLoaded', function() {
    const selectElements = document.querySelectorAll('select');

    selectElements.forEach(function(select) {
        new Choices(select, {
            itemSelectText: '',
            shouldSort: false
        });
    });
});