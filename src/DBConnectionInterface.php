<?php 
namespace api;

interface DBConnectionInterface
{
    public function connect();
    public function disconnect();
}