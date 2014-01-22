'use strict';
module.exports = function (grunt) {

    grunt.initConfig({
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'assets/js/*.js',
                '!assets/js/scripts.min.js'
            ]
        },
        less: {
            dist: {
                files: {
                    'assets/css/main.min.css': [
                        'assets/less/app.less'
                    ]
                },
                options: {
                    compress: true,
                    // LESS source map
                    // To enable, set sourceMap to true and update sourceMapRootpath based on your install
                    sourceMap: false,
                    sourceMapFilename: 'assets/css/main.min.css.map',
                    sourceMapRootpath: '/app/themes/roots/'
                }
            }
        },
        uglify: {
            dist: {
                files: {
                    'assets/js/scripts.min.js': [
                        'assets/js/plugins/bootstrap/transition.js',
                        'assets/js/plugins/bootstrap/alert.js',
                        'assets/js/plugins/bootstrap/button.js',
                        'assets/js/plugins/bootstrap/carousel.js',
                        'assets/js/plugins/bootstrap/collapse.js',
                        'assets/js/plugins/bootstrap/dropdown.js',
                        'assets/js/plugins/bootstrap/modal.js',
                        'assets/js/plugins/bootstrap/tooltip.js',
                        'assets/js/plugins/bootstrap/popover.js',
                        'assets/js/plugins/bootstrap/scrollspy.js',
                        'assets/js/plugins/bootstrap/tab.js',
                        'assets/js/plugins/bootstrap/affix.js',
                        'assets/js/plugins/*.js',
                        'assets/js/_*.js'
                    ]
                },
                options: {
                    // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
                    // sourceMap: 'assets/js/scripts.min.js.map',
                    // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
                }
            }
        },
        version: {
            options: {
                file: 'lib/scripts.php',
                css: 'assets/css/main.min.css',
                cssHandle: 'roots_main',
                js: 'assets/js/scripts.min.js',
                jsHandle: 'roots_scripts'
            }
        },
        watch: {
            less: {
                files: [
                    'assets/less/*.less',
                    'assets/less/bootstrap/*.less',
                    'assets/less/font-awesome/*.less'
                ],
                tasks: ['less', 'version']
            },
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'uglify', 'version']
            },
            livereload: {
                // Browser live reloading
                // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
                options: {
                    livereload: false
                },
                files: [
                    'assets/css/main.min.css',
                    'assets/js/scripts.min.js',
                    'templates/*.php',
                    '*.php'
                ]
            }
        },
        clean: {
            dist: [
                'assets/css/main.min.css',
                'assets/js/scripts.min.js'
            ]
        },
        compress: {
            main: {
                options: {
                    archive: 'release/rfjs-franchise.zip'
                },
                files: [
                    {
                        //expand : true,
                        src: [
                            'assets/**',
                            'lang/**',
                            'templates/**',
                            'lib/**',
                            'plugins/**',
                            '*.php',
                            'style.css',
                            'screenshot.png',
                            '!assets/less/**',
                            '!assets/js/plugins/**',
                            '!assets/js/vendor/**',
                        ],
                        dest: 'rjfs-franchise/'
                    }
//                    , // includes files in path
//                    {src: ['path/**'], dest: 'internal_folder2/'}, // includes files in path and its subdirs
//                    {expand: true, cwd: 'path/', src: ['**'], dest: 'internal_folder3/'}, // makes all src relative to cwd
//                    {flatten: true, src: ['path/**'], dest: 'internal_folder4/', filter: 'isFile'} // flattens results to a single level
                ]
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-wp-version');
    grunt.loadNpmTasks('grunt-contrib-compress');

    // Register tasks
    grunt.registerTask('default', [
        'clean',
        'less',
        'uglify',
        'version'
    ]);
    grunt.registerTask('dev', [
        'watch'
    ]);
    grunt.registerTask('deploy', [
        'default',
        'compress'
    ]);

};
