const fs = require("fs");
const path = require("path");

// Directorio donde Laravel Mix genera los archivos compilados
const buildDir = "public";

// Obtener el nombre del archivo compilado
const assets = require("./" + buildDir + "/mix-manifest.json");

// Construir el objeto manifest
const manifest = {};
Object.keys(assets).forEach((asset) => {
    // Usar el nombre del archivo como clave y su ruta completa como valor
    manifest[asset] = path.join(buildDir, assets[asset]);
});

// Escribir el archivo manifest.json
fs.writeFileSync(
    path.join(buildDir, "manifest.json"),
    JSON.stringify(manifest, null, 2)
);

console.log("Manifest file generated successfully.");
