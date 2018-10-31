<?php
function defaultAction($modelId = null)
{
    return renderResponse(
    null,
array('msgFrom' => 'Tadas',
'msgTo' => 'Eglė',
'msgSubj' => 'Dėl rytojaus',
'msgBody' => 'Rytoj PHP kursas kaip visada – 17:30',
),
    'xml'
);
}
?>