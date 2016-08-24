"use strict";

module.exports = function (grunt) {
  require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['app/js/**/*.js'],
        dest: 'built/js/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'built/js/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
        }
      }
    },
    qunit: {
      files: ['test/**/*.html']
    },
    jshint: {
      files: ['gruntfile.js', 'app/js/**/*.js', 'test/js/**/*.js'],
      options: {
        force: true,
        jshintrc: true,
        reporter: require('jshint-stylish')
      }
    },
		compass: {
			dist: {
				options: {
					sassDir: 'app/sass',
					cssDir: 'app/css',
          environment: 'development'
				}
			}
		},
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'app/css',
          src: ['*.css', '!*.min.css'],
          dest: 'built/css',
          ext: '.min.css'
        }]
      }
    },
		watch: {
      serve: {
        files: ['app/sass/**/*.{scss,sass}', '<%= jshint.files %>'],
        tasks: ['css', 'js'],
        options: {
          livereload: true
        }
      },
      test: {
        files: ['<%= jshint.files %>', '<%= qunit.files %>'],
        task: ['jshint', 'qunit'],
        options: {
          livereload: true
        }
      }
		}
	});

  // grunt.registerTask('build', ['']);
  grunt.registerTask('css', ['compass', 'cssmin']);
  grunt.registerTask('js', ['jshint', 'concat', 'uglify']);
  grunt.registerTask('serve', ['css', 'js', 'watch:serve']);
  grunt.registerTask('test', ['watch:test']);

	grunt.registerTask('default', ['']);
};
