$(document).ready(()=>{
    $('.js-contacts')
        .each(function () {
            const $this = $(this);
            const id = $this.data('contacts');
            $this.modal($(`.js-contacts-button[data-contacts="${id}"]`));
        });


});