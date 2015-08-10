<?php
$f=file('log.txt');//get generated log file
$authors=array();
$do=array();
foreach($f as $line)
{
    $line=explode('|',$line);
    if(sizeof($line)==4 && $line[0][0]=='r')
    {
        $rev=trim(substr($line[0],1)); //get revision id
        $author=trim($line[1]); //get author name
        $author_id=array_search($author,$authors); //turn name into id
        if(!$author_id)
        {
            $author_id=array_push($authors,$author);
        }
        //generate command to set properties
        $do[]='svn propset --revprop -r '.$rev.' svn:author '.'user'.$author_id.' file:////opt/csvn/data/repositories/repo_name';
    }
}
file_put_contents('do.sh',"#! /bin/sh\n".implode("\n",$do)."\ndate\n");//output command file
file_put_contents('authors.txt',implode($authors,"\n"));//save authors file for later use if needed
?>
