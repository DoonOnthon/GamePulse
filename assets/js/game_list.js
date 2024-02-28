// JavaScript to handle "Details" button click and modal display
$(document).ready(function() {

    // Select2 for choose some titles in this filter
    $('#titleFilter').select2({
        placeholder: '<?php echo $select_title[$langue]; ?>',
        width: '150px'
    });
    // Select2 for choose some categorys in this filter
    $('#categoryFilter').select2({
        placeholder: '<?php echo $select_category[$langue]; ?>',
        width: '200px'
    });
    $('#usernameFilter').select2({
        placeholder: '<?php echo $select_contributor[$langue]; ?>',
        width: '200px'
    });
    
    // Filter for titles and categorys to search in the games data
    $('#titleFilter, #categoryFilter, #usernameFilter').on('change', function() {
        // Collect filter values
        var titleFilter = $('#titleFilter').val();
        var categoryFilter = $('#categoryFilter').val();
        var usernameFilter = $('#usernameFilter').val();
        // Sending filter values to the server via AJAX
        $.ajax({
            type: 'GET',
            url: 'filter_games.php',
            data: { title: titleFilter, category: categoryFilter, github_username: usernameFilter},
            success: function(data) {
                // Updating the table with filtered results received from the server
                $('#game-table tbody').html(data);
            }
        });
    });

    $(".btn-close, .btn-close2").on("click", function() {
        $("#gameModal").modal("hide");
    });
    
    $(".btn-details").on("click", function() {

        var gameDetails = $(this).data("game-details");

        // Update the modal content with game details
        $("#gameModal .modal-title").text(gameDetails.title);
        $("#gameModal .modal-body").html(
            "<p><strong>Category:</strong> " + gameDetails.category + "</p>" +
            "<p><strong>Release Date:</strong> " + gameDetails.release_date + "</p>" +
            "<p><strong>Sales Numbers (Approx):</strong> " + gameDetails.sales_numbers + "</p>" +
            "<p><strong>Contributor:</strong> " + gameDetails.github_username + "</p>"
           
        );

        // Show the modal manually
        $("#gameModal").modal("show");
    });

    $(".btn-trailer").on("click", function() {
    });
});