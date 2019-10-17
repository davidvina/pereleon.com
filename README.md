# GULP GENERIC

## INSTAL·LACIÓ


## CONFIGURACIÓ

La configuració la trobem al arxiu `gulp_config.json`. Es pot configurar:

- Conectar i desconectar que compili css o js (sass.compile, js.compile)
- Rutes de scss (sass.ssrc) i de css (sass.dest)
- Tipus de sortida css (sass.options.outputStyle)
- Rutes d'origen i sortida de js
- Minimitzar js (js.uglify)
- Configuració Autoprefixer
- Live reload de host (browserSync.proxy)
- Llistat d'arxius per el watch (browserSync.watch)

```json
{
	"sass":{
		"compile": true,
		"src": "assets/scss",
		"dest": "user/themes/base-theme/assets/css",
		"options": {
			"errLogToConsole": true,
			"outputStyle": "compressed"
		}
	},
	"autoPrefixer" : {
		"browsers": [
			"last 4 versions",
			"> 1%",
			"ie >= 10"
		]
	},
	"js":{
		"compile": true,
		"uglify": true,
		"src": "assets/js",
		"dest": "user/themes/base-theme/assets/js"
	},
	"browserSync" : {
		"watchfiles" : [
			"user/**/*.php",
			"user/pages/**/*.md",
			"user/pages/**/*.{png,jpg,gif,svg}",
			"user/themes/base-theme/assets/**/*.{png,jpg,gif,svg}",
			"user/themes/base-theme/assets/**/*.css",
			"user/themes/base-theme/assets/**/*.js"
		],
		"proxy" : "ingrup.web"
	}
}
```

### TASQUES GULP

- `gulp` : compila i llança browserSync (LiveReload)
- `gulp sassCompile` : compila sass
- `gulp script` : compila js
- `gulp clean` : neteja carpeta de destí carpeta js i css
- `gulp startWatch` : inicia el watch de js i sass (sense LiveReload)
- `gulp browser_sync` : inicia el liveReload
