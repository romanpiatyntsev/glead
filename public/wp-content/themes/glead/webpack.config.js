const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
// const ESLintPlugin = require('eslint-webpack-plugin');
// const StylelintPlugin = require('stylelint-webpack-plugin');

//const CopyPlugin           = require( "copy-webpack-plugin" ); // For WordPress we need to copy images from src to public to optimize them

const path = require('path')
const glob = require('glob')

module.exports = (env) => {
	return {
		mode: env.production ? 'production' : 'development',
		entry: glob.sync('./assets/src/js/*.js').reduce((obj, v) => {
			obj[path.basename(v, '.js')] = v
			return obj
		}, {}),
		output: {
			path: path.resolve(__dirname, 'assets/public/js'),
			filename: '[name].js',
			clean: true,
		},
		devtool: env.production ? false : 'source-map',
		module: {
			rules: [
				{
					test: /\.scss$/,
					use: [
						// create separated file
						MiniCssExtractPlugin.loader,
						// Translates CSS into CommonJS
						{
							// Compiles Sass to CSS
							loader: 'css-loader',
							options: {
								sourceMap: !env.production,
							},
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: !env.production,
							},
						},
					],
				},
				{
					test: /\.m?js$/,
					include: path.resolve( __dirname, 'assets/src/js' ),
					exclude: /(node_modules|bower_components)/,
					use: {
						loader: 'babel-loader'
					},
				},
			],
		},
		optimization: {
			minimizer: [
				new CssMinimizerPlugin(),
				'...', // access the defaults
			],
		},
		plugins: [
			new MiniCssExtractPlugin({
				filename: '../css/[name].css',
			}),
			//new ESLintPlugin(),
			//new StylelintPlugin(),
			// new CopyPlugin( { // Copies images from src to public
			//   patterns: [ { from: projectOptions.projectImagesPath, to: projectOptions.projectOutput + '/images' }, ],
			// } ),
			// new BrowserSyncPlugin({
			// 	files: '**/*.php',
			// 	proxy: '127.0.0.1'
			// })
		],
	}
}