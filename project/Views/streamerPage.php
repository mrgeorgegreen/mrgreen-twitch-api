<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Twitch </title>
</head>
<body>
<h2 class="text-center">Streamer Page</h2>
<div class="container">
    <div class="row">
        <div id="twitch-embed"></div>
    </div>

    <div class="row">
            <label for="comment">Events:</label>
            <textarea id="text"  class="form-control" rows="12"></textarea>
    </div>
</div>

<!-- Load the Twitch embed script -->
<script src="https://embed.twitch.tv/embed/v1.js"></script>
<!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
<script type="text/javascript">
    new Twitch.Embed("twitch-embed", {
        width: 1200,
        height: 500,
        channel: "<?= $data['streamer'] ?? '' ?>"
    });
</script>

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

<script type="text/javascript">
    var clientId = "<?= $data['clientId'] ?? '' ?>";

    $(function () {
        if (document.location.hash.match(/access_token=(\w+)/))
            parseFragment(document.location.hash);
        if (sessionStorage.twitchOAuthToken) {
            $.ajax({
                url: "https://api.twitch.tv/v5/channels/<?= $data['streamer_id'] ?? '' ?>/events",
                method: "GET",
                headers: {
                    "Client-ID": clientId,
                    "Authorization": "Bearer " + sessionStorage.twitchOAuthToken
                }
            })
                .done(function (events) {
                    $.each(events.data, function (key, event) {
                        $('#text').append(event.data.description);
                    });
                });
        }
    });

</script>

</body>
</html>

