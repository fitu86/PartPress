#!/bin/bash

cd "$HOME/proyectos/PartPressDev" || exit 1

echo "📦 Preparando commit..."
git add .

read -p "📝 Ingresa el mensaje del commit: " MSG

if [ -z "$MSG" ]; then
  echo "❌ Debes ingresar un mensaje de commit."
  exit 1
fi

git commit -m "$MSG"
git push

echo "✅ Cambios enviados a GitHub."
