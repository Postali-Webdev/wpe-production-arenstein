module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		jshint: {
			options: {
				force: true
			},
			all: ['assets/js/src/*.js']
		},
		
		// Add new js files from the /assets/js/src/ directory to be compiled as well as what they should be output as
		concat: {
			dist: {
				src: ['assets/js/src/sripts.js'],
				dest: 'assets/js/scripts.min.js',
				src: ['assets/js/src/slick-custom.js'],
				dest: 'assets/js/slick-custom.min.js'
			}
		},

		uglify: {
			min: {
				files: {
					'assets/js/scripts.min.js': ['assets/js/src/scripts.js'],
					'assets/js/slick-custom.min.js': ['assets/js/src/slick-custom.js']
				}
			}
		},

		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},

		watch: {
			scripts: {
				files: ['assets/js/src/*.js'],
				tasks: ['assets/jshint', 'concat', 'uglify']
			},
			styles: {
				files: ['assets/sass/*.scss'],
				tasks: ['compass'],
				options: {
					livereload: true
				},
			},
		},

	});

	// Load tasks
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task(s).
	grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'compass']);

};