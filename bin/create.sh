#!/bin/bash

if [ $# -lt 1 ]; then
  echo "Usage: $0 filename"
  exit 1
fi

filename=$1
if [ -f $filename ]; then
  echo "$filename already exists."
  exit 1
fi

namespace=$(basename $(dirname $filename))
class=$(basename $filename .php)

tmpfile=$(mktemp)

cat <<EOS >$tmpfile
<?php
namespace YUti\Dpmt\__NAMESPACE__;
__REQUIRE_ONCE__
class __CLASS__
{__MAIN_DEF__
}__CALLMAIN__
EOS

require_once=
maindef=
callmain=
if [ "${class##*_}" == "Main" ]; then
  requireonce='\nrequire_once __DIR__ . __QUOTE__/../../vendor/autoload.php__QUOTE__;\n';
  maindef='\n    public static function main(array $argv)\n    {\n    }'
  callmain='\n\nif (isset($argv)) {\n    __CLASS__::main($argv);\n}'
fi


cat $tmpfile \
| sed "s!__REQUIRE_ONCE__!$requireonce!" \
| sed "s/__MAIN_DEF__/$maindef/" \
| sed "s/__CALLMAIN__/$callmain/" \
| sed "s/__NAMESPACE__/$namespace/" \
| sed "s/__CLASS__/$class/" \
| sed "s!__QUOTE__!'!g" \
>$filename

rm -f $tmpfile
