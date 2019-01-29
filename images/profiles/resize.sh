#!/bin/bash
#requires imagemagick
convert $1 -resize "260x300^" -gravity center -crop 260x300+0+0 +repage $2