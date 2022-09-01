# Ekomobile API PHP demo

## Requirements
- php >= 7.1
- ext-protobuf
- ext-grpc

## Usage

1. Add private key to SSH agent
```
ssh-add /path/to/client.key
```

2. Run composer install
```
composer install
```

3. Set environment variable `EKO_API_CLIENT_CERT` with path to your client certificate
```
export EKO_API_HOST=/path/to/client.pem
```

4. Set environment variable `EKO_API_ADDRESS` with proper eko-api address

```
export EKO_API_ADDRESS=host.example.com:443
```

5. Run demo application
```
php demo.php
```
