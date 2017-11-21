#!/bin/sh
# Author:       Valentin Popov
# Email:        info@valentineus.link
# Date:         2017-11-21
# Usage:        /bin/sh build.sh
# Description:  Build the final package for installation in Moodle.

# Updating the Environment
PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
export PATH="$PATH:/usr/local/scripts"

# Build the package
cd ..
mv "./moodle-billingpatch" "./local_billingpatch"
zip -9 -r "local_billingpatch.zip" "local_billingpatch"  \
        -x "local_billingpatch/.git*"       \
        -x "local_billingpatch/.travis.yml" \
        -x "local_billingpatch/build.sh"

# End of work
exit 0