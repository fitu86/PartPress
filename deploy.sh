#!/bin/bash

SRC="$HOME/proyectos/PartPressDev"
DEST="/var/www/chocolopas.com/wp-content/plugins/PartPress"
BACKUP="/tmp/PartPress_backup_$(date +%Y%m%d_%H%M%S)"
OWNER="www-data:www-data"

echo "🚀 Desplegando PartPress..."

if [ ! -d "$SRC" ]; then
  echo "❌ El directorio de origen no existe: $SRC"
  exit 1
fi

if [ -d "$DEST" ]; then
  echo "📦 Backup previo en: $BACKUP"
  sudo cp -r "$DEST" "$BACKUP"
fi

sudo rm -rf "$DEST"
sudo cp -r "$SRC" "$DEST"
sudo chown -R $OWNER "$DEST"

echo "✅ Plugin desplegado en producción."
echo "ℹ️ Revisa que todo funcione correctamente antes de hacer commit."
