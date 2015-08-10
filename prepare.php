<?php
$f=file('log.txt');
$authors=array();
$do=array();
foreach($f as $line)
{
    $line=explode('|',$line);
    if(sizeof($line)==4 && $line[0][0]=='r')
    {
        $rev=trim(substr($line[0],1));
        $author=trim($line[1]);
        $author_id=array_search($author,$authors);
        if(!$author_id)
        {
            $author_id=array_push($authors,$author);
        }
        $do[]='svn propset --revprop -r '.$rev.' svn:author '.'user'.$author_id.' file:////opt/csvn/data/repositories/repo_name';
    }
}
file_put_contents('do.sh',"#! /bin/sh\n".implode("\n",$do)."\ndate\n");
file_put_contents('authors.txt',implode($authors,"\n"));
?>
