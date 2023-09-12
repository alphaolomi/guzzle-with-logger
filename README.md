# Guzzle HTTP Client with Log Middleware

When using Guzzle HTTP Client, it is often useful to log the requests and responses. This package provides a Guzzle middleware that can be used to log the requests and responses.

```php
[2023-08-21T13:52:05.842252+02:00] guzzle.DEBUG: Guzzle HTTP request {"request":{"method":"GET","headers":{"User-Agent":["GuzzleHttp/7"],"Host":["jsonplaceholder.typicode.com"]},"uri":"/posts/1","version":"HTTP/1.1"}} []

[2023-08-21T13:52:05.848291+02:00] guzzle.DEBUG: Guzzle HTTP response {"response":{"headers":{"Date":["Mon, 21 Aug 2023 11:52:05 GMT"],"Content-Type":["application/json; charset=utf-8"],"Content-Length":["292"],"Connection":["keep-alive"],"X-Powered-By":["Express"],"X-Ratelimit-Limit":["1000"],"X-Ratelimit-Remaining":["999"],"X-Ratelimit-Reset":["1680098208"],"Vary":["Origin, Accept-Encoding"],"Access-Control-Allow-Credentials":["true"],"Cache-Control":["max-age=43200"],"Pragma":["no-cache"],"Expires":["-1"],"X-Content-Type-Options":["nosniff"],"Etag":["W/\"124-yiKdLzqO5gfBrJFrcdJ8Yq0LGnU\""],"Via":["1.1 vegur"],"CF-Cache-Status":["HIT"],"Age":["17924"],"Accept-Ranges":["bytes"],"Report-To":["{\"endpoints\":[{\"url\":\"https:\\/\\/a.nel.cloudflare.com\\/report\\/v3?s=Odvd1Bpgay873cfm5xKUeKQjEIildfpnTP4V5HWECm3wVJGt%2BsIc90Uehl8ODE2QUdmCQusUsM6T7P2utH6BUWngr9YO8Eg8FUzexdKhQeMSqaGdGGROuelrNkbqV70JBDHf0Gx47l%2FZRCvoLFld\"}],\"group\":\"cf-nel\",\"max_age\":604800}"],"NEL":["{\"success_fraction\":0,\"report_to\":\"cf-nel\",\"max_age\":604800}"],"Server":["cloudflare"],"CF-RAY":["7fa2aafd1ee80e60-AMS"],"alt-svc":["h3=\":443\"; ma=86400"]},"status_code":200,"version":"HTTP/1.1","message":"OK","body":{"userId":1,"id":1,"title":"sunt aut facere repellat provident occaecati excepturi optio reprehenderit","body":"quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"}}} []
```

## Getting started

Install the package using composer:

```bash
composer install 
```

## Usage

```bash
./bin/glogger --help
```

```bash
./bin/glogger
```

## Available Commands
- `all`         Get all posts from JSONPlaceholder
- `completion`  Dump the shell completion script
- `get`         Make a GET request to JSONPlaceholder
- `help`        Display help for a command
- `list`        List commands
- `post`        Make a POST request to JSONPlaceholder
