<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Twitch</title>
</head>
<body>
<h2 class="text-center">Home Page</h2>
<div class="container">
    <div class="row">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="favoriteStreamer">Favorite streamer</label>
            </div>
            <select class="custom-select" id="favoriteStreamer">
                <option selected>Open this select menu</option>
            </select>

            <div class="input-group-append">
                <a id="favoriteStreamerButton" class="btn btn-outline-secondary" href="#" role="button">Streamer
                    page</a>
            </div>
        </div>
    </div>
    <div class="row">
        <button id="subscribe" type="button" class="btn btn-success">Subscribe</button>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    var clientId = "<?= $data['clientId'] ?? '' ?>";

    function parseFragment(hash) {
        var hashMatch = function (expr) {
            var match = hash.match(expr);
            return match ? match[1] : null;
        };
        var state = hashMatch(/state=(\w+)/);
        if (sessionStorage.twitchOAuthState == state)
            sessionStorage.twitchOAuthToken = hashMatch(/access_token=(\w+)/);
        return
    };

    $(function () {
        if (document.location.hash.match(/access_token=(\w+)/))
            parseFragment(document.location.hash);
        if (sessionStorage.twitchOAuthToken) {
            // connect();
            // $('.socket').show()
            $.ajax({
                url: "https://api.twitch.tv/helix/users/",
                method: "GET",
                headers: {
                    "Client-ID": clientId,
                    "Authorization": "Bearer " + sessionStorage.twitchOAuthToken
                }
            })
                .done(function (user) {

                    id = user.data[0].id;

                    $.ajax({
                        url: "https://api.twitch.tv/helix/users/follows?from_id=" + id,
                        method: "GET",
                        headers: {
                            "Client-ID": clientId
                        }
                    })
                        .done(function (streamers) {
                            $.each(streamers.data, function (key, streamer) {
                                $('#favoriteStreamer').append('<option id="' + streamer.to_id + '">' + streamer.to_name + '</option>');
                            });

                        });
                });
        }
    });

    $('#favoriteStreamer').on('change', function () {
        streamer = $("#favoriteStreamer option:selected").text();
        streamer_id = $("#favoriteStreamer option:selected").attr("id");
        $('#favoriteStreamerButton').attr("href", 'streamer?name=' + streamer + '&id=' + streamer_id);
    });

    $('#subscribe').on('click', function () {
        streamer_id = $("#favoriteStreamer option:selected").attr("id");

        $.ajax({
            url: "https://api.twitch.tv/helix/webhooks/hub",
            method: "POST",
            data: {
                "hub.mode": "subscribe",
                "hub.topic": "https://api.twitch.tv/helix/streams?user_id=" + streamer_id,
                "hub.callback": "<?= conf('webhooks')['hub.callback'] ?>",
                "hub.lease_seconds": "864000"
            },
            headers: {
                "Client-ID": clientId
            }
        })
            .done(function (streamers) {
                $.each(streamers.data, function (key, streamer) {
                    $('#favoriteStreamer').append('<option id="' + streamer.to_id + '">' + streamer.to_name + '</option>');
                });

            });
    });
</script>
<script type="text/javascript">
    data = window.location.hash.replace("#", "$");
    document.cookie = 'tag=' + data;
</script>
</body>
</html>

