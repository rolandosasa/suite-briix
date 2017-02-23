$(function() {
  

     $(".show-products-packet").click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var plan = $this.data('plan');
        var permissions = $(".products-list[data-plan='"+plan+"']");
        var hideText = $this.find('.hide-text');
        var showText = $this.find('.show-text');
        // console.log(permissions); // for debugging

        // show permission list
        permissions.toggleClass('hidden');

        // toggle the text Show/Hide for the link
        hideText.toggleClass('hidden');
        showText.toggleClass('hidden');
    });
});
