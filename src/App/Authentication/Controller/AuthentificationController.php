<?php

// declare namespace

//use dependencies via namespace

class AuthentificationController extends BaseController
{
    public function index(RequestInterface $request)
    {
        return $this->response()
            ->setHTTPCode(Response::HTTP_NOT_FOUND)
            ->setContentType("application/json")
            ->setContent("We don't know " . $request->getQueryParam("user"))
            ->setCookie("uid", null, time());
    }
}