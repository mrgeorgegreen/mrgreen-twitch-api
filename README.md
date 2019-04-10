# mrgreen-twitch-api StreamerEventViewer (SEV)

[Task Description](https://gist.github.com/osamakhn/14a378f3107d49de47e0b617a3d5fdf5)

## Specifications

1. The first/home page lets a user login with Twitch and set their favorite Twitch streamer name. This initiates a backend event
   listener which listens to all events for given streamer.
> After [login](https://mrgreen-twitch-api.herokuapp.com/) Twitch redirecting to [home page](https://mrgreen-twitch-api.herokuapp.com/twitch)
> To begin initiates a backend event listener need tab to button "Subscribe". This send request to `webhooks/hub`.
> But is not specified where need to show notifications! On streamer's page I can't use backend side.
> Also there is button "Streamer page" to open streamer page.

2. The second/streamer page shows an embedded livestream, chat and list of 10 most recent events for your favorite streamer. This page
   doesn’t poll the backend and rather leverages web sockets and relevant Twitch API.
> For Chat and Video used Embedding iframe. To get event, without back-end side (Webhooks) 
> I [found](https://discuss.dev.twitch.tv/t/events-api-past-events/11543) unsupported/undocumented api.twitch.tv/v5/channels/{channelId}/events. But it can not returning past events.

3. Additionally please answer following questions at the bottom of your `README`:
-  How would you deploy the above on AWS? (ideally a rough architecture diagram will help)
> Firstly requirement is using containers, and it is done. PHP application have good opportunity to scaling.
> But main challenge is scaling of DB, DB is bottleneck. Configuration depends from expected loaded.
> Usual schema is - many php(application) servers,  and one or two relational dbs.

-  Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/day to
   900MM reqs/day over 6 months?
> 


Scratches: 
https://mrgreen-twitch-api.herokuapp.com/
https://mrgreen-twitch-api.herokuapp.com/get-notification
https://mrgreen-twitch-api.herokuapp.com/get-log


#RUN composer update
#RUN composer dump-autoload -o

#sudo chown -R :www-data /db/sqlite
#sudo chmod -R 775 /db/sqlite/database.sqlite
