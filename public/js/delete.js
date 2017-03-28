(function ($) {

    $(document).ready(function () {

        $("a.confirm-action").on('click', function () {
            if (!confirm("Are you sure?")) {
                return false;
            }
        });

    });

}(jQuery));