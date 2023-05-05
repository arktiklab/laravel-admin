<?php

namespace Arktiklab\LaravelAdmin\Page;

trait HasPage
{
    public function page(string $uri, \Closure $callable): PageRoute
    {
        /**
         * @var PageView $pageView
         */
        $pageView = tap(new PageView(), $callable);

        /**
         * @var PageRoute $page
         */
        $page = $this->pages->first(fn(PageRoute $page) => $page->uri === $uri);

        if($page) {
            $page->view->name($pageView->getName())->with($pageView->data->toArray());
            return $page;
        }

        $page = new PageRoute($uri, $pageView);

        $this->pages->push($page);

        return $page;
    }
}
