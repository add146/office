# Office Khibroh - Docker Deployment

## Quick Start

```bash
# 1. Build dan jalankan
docker-compose up -d --build

# 2. Tunggu sampai semua container running
docker-compose ps

# 3. Akses aplikasi
# App: http://your-server-ip
# phpMyAdmin: http://your-server-ip:8080
```

## Credentials

| Service | User | Password |
|---------|------|----------|
| MySQL | root | secret_password |
| phpMyAdmin | root | secret_password |

## Commands

```bash
# Stop
docker-compose down

# Restart
docker-compose restart

# View logs
docker-compose logs -f app

# Rebuild
docker-compose up -d --build --force-recreate
```

## Notes

- Ubah `secret_password` di `docker-compose.yml` sebelum deploy ke production
- Data MySQL disimpan di Docker volume `db_data`
- Upload files disimpan di folder lokal `assets/uploads`
