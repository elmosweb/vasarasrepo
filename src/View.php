<?php
namespace Quiz;
class View{
    /** @var string  */
    protected $viewFile;
    /** @var string  */
    protected $templateFile;
    /** @var string */
    public $js ='';
    /** @var string[]  */
    public $jsFiles = [];
    public $cssFiles = [];
    public function __construct(string $viewName, string $templateName)
    {
        $this->viewFile = $this->getViewFilePath($viewName);
        $this->templateFile = $this->getViewFilePath($templateName, TEMPLATE_BASE_FOLDER);
    }
    public function getViewFilePath(string $viewName, string $baseDir= VIEW_BASE_FOLDER)
    {
        return $baseDir . DS. $viewName. '.php';
    }
    public function  render(array $params = []) :string {
        return $this->getFileContents($this->templateFile, $params);
    }

    public function renderContent($params =[]) : string {
        return $this->getFileContents($this->viewFile, $params);
    }

    /**
     * @param $fileName
     * @param array $params
     * @return false|string
     */
    public function getFileContents($fileName, $params =[]){
        extract($params);
        $content = '';

        if(!empty($this->viewFile)&& file_exists($this->viewFile)){
            ob_start();
            include "$fileName";
            $content = ob_get_clean();
        }
        return $content;
    }
    public function registerJs(string $js)
    {
    $this->js .= $js;
    }

    /**
     * @param $fileName
     */
    public function registerJsFile($fileName){
        $this->jsFiles[] = $fileName;
    }
    public function registerCssFile($fileName){
        $this->cssFiles[] = $fileName;
    }
    public function renderView(string $viewName, array $params =[]){
        $filePath = $this->getViewFilePath($viewName);
        return $this->getFileContents($filePath, $params);
    }

}