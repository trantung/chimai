<?php 

class Paginate extends Illuminate\Pagination\BootstrapPresenter {

    public function getActivePageWrapper($text)
    {
        return '<li class="current">'.$text.'</li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li><a href="">'.$text.'</a></li>';
    }

    public function getNormalTextWrapper($text)
    {
        return '<li><a href="">'.$text.'</a></li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        return '<li><a href="'.$url.'">'.$page.'</a></li>';
    }
    
    public function render()
    {
        if($this->lastPage < 3) {
            $content = $this->getPageRange(1, $this->lastPage); 
        } else {
            if ($this->currentPage == 1) {
                $content = $this->getPageRange(1, $this->currentPage + 2); 
            }
            else if ($this->currentPage >= $this->lastPage) {
                $content = $this->getPageRange($this->currentPage - 2, $this->lastPage); 
            }
            else {
                $content = $this->getPageRange($this->currentPage - 1, $this->currentPage + 1); 
            }
        }
        return $this->getFirst() . $this->getPrevious('<i class="fa fa-angle-left"></i>') . $this->getLinks(). $content . $this->getLastLinks() . $this->getNext('<i class="fa fa-angle-right"></i>').$this->getLast();
    }

    public function getFirst($text = '<i class="fa fa-angle-double-left"></i>')
    {
        if ($this->currentPage <= 1)
        {
            return $this->getDisabledTextWrapper($text);
        }
        else
        {
            $url = $this->paginator->getUrl(1);
            return $this->getPageLinkWrapper($url, $text);
        }
    }

    public function getLast($text = '<i class="fa fa-angle-double-right"></i>')
    {
        if ($this->currentPage >= $this->lastPage)
        {
            return $this->getDisabledTextWrapper($text);
        }
        else
        {
            $url = $this->paginator->getUrl($this->lastPage);

            return $this->getPageLinkWrapper($url, $text);
        }
    }

    public function getLinks()
    {
        $html = '';
        if ($this->currentPage >= 3) {
          $html .= $this->getNormalTextWrapper('...');
        }
        return $html;
    }

    public function getLastLinks()
    {
        $html = '';
        if ($this->currentPage <= $this->lastPage - 2) {
          $html .= $this->getNormalTextWrapper('...');
        }
            return $html;
    }
}