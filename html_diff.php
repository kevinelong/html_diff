<?php

function html_diff($old, $new)
{
    $old = preg_replace('/ +/', ' ', $old);
    $new = preg_replace('/ +/', ' ', $new);

    $old_lines = explode("\n", trim($old) . "\n");
    $new_lines = explode("\n", trim($new) . "\n");
    $size = max(count($old_lines), count($new_lines));

    $identical_lines = array_intersect($old_lines, $new_lines);
    $inserted_lines = array_diff($new_lines, $old_lines);
    $deleted_lines = array_diff($old_lines, $new_lines);

    $out = array();

    for ($i = 0; $i < ($size - 1); $i++) {


        $line_number = $i + 1;

        if (isset ($deleted_lines [$i])) {
            $out[] = "<div class='deleted_line'><del> - $line_number: {$deleted_lines[$i]}</del></div>";
        }

        if (isset ($identical_lines [$i])) {
            $out[] = "<div class='identical_line'> &nbsp; $line_number: {$identical_lines[$i]}</div>";
        }

        if (isset ($inserted_lines [$i])) {
            $out[] = "<div class='inserted_line'> + $line_number: <ins>{$inserted_lines[$i]}</ins></div>";
        }
    }
    $out[] = <<<HTML
<style>
.identical_line,
.inserted_line, ins,
.deleted_line, deleted_lines{
  font-family:monospace,monospace;
  font-size:1em;
}
    .inserted_line, ins{
        color:green;
    }
    .deleted_line, deleted_lines{
        text-decoration-color:red;
        color:red;
        }
</style>
HTML;

    return implode('', $out);
}
