'use strict';

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      build: [
        'build'
      ]
    },
    cssmin: {
      production: {
        expand: true,
        cwd: 'build/css',
        src: ['*.css'],
        dest: 'build/css'
      }
    },
    hashres: {
      options: {
        encoding: 'utf8',
        fileNameFormat: '${name}.${hash}.cache.${ext}',
        renameFiles: true
      },
      production: {
        src: [
          'build/js/*.js',
          'build/css/*.css'
        ],
        dest: 'build/**/*.html'
      }
    },
    imagemin: {
      production: {
        options: {
          optimizationLevel: 7,
          progressive: true
        },
        files: [{
          expand: true,
          cwd: 'build/',
          src: ['**/*.{png,jpg,jpeg,gif}'],
          dest: 'build/',
        }]
      }
    },
    jshint: {
      production: [
        'contents/js/*.js',
        'Gruntfile.js' ]
    },
    less: {
      production: {
        options: {
          paths: ["contents/css"],
          cleancss: true
        },
        files: {
          "build/css/app.css": "contents/css/app.less"
        }
      }
    },
    uglify: {
      production: {
        files: {
          'build/js/app.js': ['build/js/app.js']
        }
      }
    },
    rsync: {
      options: {
        args: ["--chmod=Du=rwx,Dg=rws,Do=rx,Fug=rw,Fo=r"],
        exclude: [".git*","*.less","node_modules"],
        recursive: true,
        ssh: true
      },
      production: {
        options: {
          src: "build/",
          dest: "/vol/www-virtual/acm",
          host: "gituser.doc.ic.ac.uk"
        }
      }
    },
    watch: {
      options: {
        livereload: true,
      },
      js: {
        files: '<%= jshint.all %>',
        tasks: ['jshint', 'uglify']
      },
      livereload: {
        files: ['*.html', 'contents/**/*.{png,jpg,jpeg,gif,svg}']
      }
    },
    wintersmith: {
      production: {},
      preview: {
        options: {
          action: 'preview'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-hashres');
  grunt.loadNpmTasks('grunt-rsync');
  grunt.loadNpmTasks('grunt-wintersmith');

  grunt.registerTask('default', ['watch']);
  grunt.registerTask('preview', 'wintersmith:preview');

  grunt.registerTask('prebuild', [
    'clean:build'
  ]);

  grunt.registerTask('postbuild', [
    'imagemin:production',
    'uglify:production',
    'cssmin:production',
    'hashres:production',
  ])

  grunt.registerTask('build', [
    'prebuild',
    'postbuild'
  ]);

  grunt.registerTask('deploy', [
    'build',
    'rsync:production'
  ]);
}
