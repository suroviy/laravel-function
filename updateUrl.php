<?php
function updateUrl (array $newGet = array())
{
    if (is_array(Input::all()))
    {
        $get = array_merge(Input::get(), $newGet);
        $array = array_where($get, function($key, $value) use ($newGet)
        {
            if (isset($newGet[$key]))
            {
                return ($newGet[$key] !== false) ? true : false;
            }
            return true;
        });
        $param = ($param = http_build_query($array)) ? '?'.$param : null;
        return \URL::current().$param;
    }
    return \URL::current();
}
