#!/usr/bin/env bash
TEXT='{"text":"'$1'"}'
GITTER_ROOMID=$2
GITTER_TOKEN=$3
curl --silent -X POST -i -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer ${GITTER_TOKEN}" "https://api.gitter.im/v1/rooms/${GITTER_ROOMID}/chatMessages" -d "${TEXT}"
