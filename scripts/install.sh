#!/bin/bash

# punssh controller
CTL="${BASEURL}index.php?/module/punssh/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/punssh" -o "${MUNKIPATH}preflight.d/punssh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/punssh"

	# Set preference to include this file in the preflight check
	setreportpref "punssh" "${CACHEPATH}punssh.json"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/punssh"

	# Signal that we had an error
	ERR=1
fi


