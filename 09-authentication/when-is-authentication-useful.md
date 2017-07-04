## When is Authentication Useful？

### Read-only APIs
If you API is entirely read-only and the data is not sesitive, then you can just make it available and not worry about authentication, this is perfect. !!!!!!!!But some people could be attacking your API with DDoS.

### Internal APIs
If your API runs over a private network or is locked down with firewall rules and you do not require user context for you API, then you could probably skip authentication. !!!!!!!!But if network is breached, then hackers would be able to do rather a lot of damage.
