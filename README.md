# symfony-demo-graphql-postgres
Symfony demo application with graphql bundle and postgres db

```bash
symfony serve --port=9074
```

After creating resolver, e.g. UserResolver

Queries can be tested by running HTTP requests (in tests dir/)

tests/Http/overblog_graphql_endpoint.http

And using data from symfony-demo SQLite db:

```bash
POST http://127.0.0.1:9074/graphql/
Content-Type: application/json

{
    "query": "query { hello }"
}
```

The response should be:

```bash
{
  "data": {
    "hello": "Hello from GraphQL!"
  }
}
```
