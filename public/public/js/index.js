$(document).ready(function() {
    $('#logoutBtn').on('click', function() {
        $('#logoutModal').modal('show');
    });

    $('#confirmLogout').on('click', function() {
        // Perform logout action
        window.location.href = 'logout'; // Redirect to logout route
    });
});

$(document).ready(function() {
    $('#loginBtn').on('click', function() {
        $('#loginModal').modal('show');
    });

    // $('#confirmLogout').on('click', function() {
    //     // Perform logout action
    //     window.location.href = 'logout'; // Redirect to logout route
    // });
});