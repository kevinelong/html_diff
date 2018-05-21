<?php
require_once ("html_diff.php");

function test_html_diff()
{

    $a = <<<TEXT
Now is the
time for all


good people


to come to
the aid of
their party.
TEXT;

    $b_same = <<<TEXT
Now is the


time for all
good people
to come to
the aid of
their party.
TEXT;

    $b_removed = <<<TEXT
Now is the
time for all
to come to
the aid of
their party.
TEXT;

    $b_added = <<<TEXT
Now is the
time for all
very
good people
to come to
the aid of
their party.
TEXT;

    $b_changed = <<<TEXT
Now is the
time for all
good folks
to come to
the aid of
their planet.
TEXT;

    $b_blank = '';

    echo "<br>\nSAME:<BR>\n";
    echo html_diff($a, $b_same);

    echo "<br>\nREMOVED:<BR>\n";
    echo html_diff($a, $b_removed);

    echo "<br>\nADDED:<BR>\n";
    echo html_diff($a, $b_added);

    echo "<br>\nCHANGED:<BR>\n";
    echo html_diff($a, $b_changed);

    echo "<br>\nBLANK:<BR>\n";
    echo html_diff($a, $b_blank);

}

test_html_diff();