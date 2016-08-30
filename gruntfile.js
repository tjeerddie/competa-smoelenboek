"use strict";

module.exports = function (grunt) {
  require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
    clean: {
      build: ['build/css/*', 'build/js/*', '!build/js/jquery-3.1.0.min.js'],
      afterMinifying: ['build/css/**/*.css',
                       '!build/css/<%= pkg.name %>.min.css',
                       'build/js/**/*.js',
                       '!build/js/**/*.min.js'
                      ]
    },
    copy: {
      options: {
        force: true
      },
      main: {
        expand: true,
        src: ['src/*', '!src/sass/*'],
        dest: 'dest/'
      },
    },
    // TODO: Fix imagemin
    // imagemin: {
    //   dynamic: {
    //     files: [{
    //       expand: true,
    //       cwd: 'app/img',
    //       src: ['**/*.{png,jpg,gif}'],
    //       dest: 'dist/img'
    //     }]
    //   }
    // },
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['app/js/**/*.js'],
        dest: 'build/js/<%= pkg.name %>.js'
      }
    },
    uglify: {
      dist: {
        files: {
          'build/js/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
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
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'build/css/<%= pkg.name %>.min.css': ['app/css/**/*.css']
        }
      }
    },
    connect: {
      server: {
        options: {
          port: 8080,
          base: 'build',
          livereload: false,
          open: {
            target: 'http//http://localhost:8080'
          }
        }
      }
    },
		watch: {
      server: {
        files: ['app/sass/**/*.{scss,sass}', '<%= jshint.files %>'],
        tasks: ['css', 'js', 'build'],
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

  // TODO: Add imagemin to minifying task.
  grunt.registerTask('minifying', ['cssmin', 'concat', 'uglify']);
  grunt.registerTask('build', ['clean:build', 'copy:main', 'minifying', 'clean:afterMinifying']);
  grunt.registerTask('css', ['compass', 'cssmin']);
  grunt.registerTask('js', ['jshint', 'concat', 'uglify']);
  grunt.registerTask('serve', ['build', 'css', 'js', 'connect:server', 'watch:server']);
  grunt.registerTask('test', ['watch:test']);

	grunt.registerTask('default', ['build']);
};
