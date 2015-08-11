# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
sass_dir = "www/sass"
css_dir = "www/res"
images_dir = "www/res"
javascripts_dir = "www/js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = true

# Path to cache folder
sass_options = {:cache_location => "./system/cache/sass/"}
cache_dir = "./system/cache/sass/"

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
