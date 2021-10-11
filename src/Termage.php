<?php

declare(strict_types=1);

namespace Termage;

use Atomastic\Macroable\Macroable;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Terminal;
use Termage\Base\Theme;
use Termage\Components\Alert;
use Termage\Components\Chart;
use Termage\Components\El;
use Termage\Components\Emoji;
use Termage\Components\Link;
use Termage\Components\Rule;
use Termage\Parsers\Shortcodes;
use Termage\Themes\DefaultTheme;

class Termage
{
    use Macroable;

    /**
     * The implementation of output interface.
     *
     * @access private
     */
    private OutputInterface $output;

    /**
     * The instance of Terminal class.
     *
     * @access private
     */
    private Terminal $terminal;

    /**
     * Theme class object.
     *
     * @access private
     */
    private $theme;

    /**
     * The instance of Shortcodes clas.
     */
    private Shortcodes $shortcodes;

    /**
     * Create a new Termage instance.
     *
     * @param OutputInterface $output Output interface.
     * @param InputInterface  $input  Input interface.
     * @param Theme           $theme  Instance of the Theme class.
     *
     * @access public
     */
    public function __construct(
        ?OutputInterface $output = null,
        ?Theme $theme = null
    ) {
        $this->output     = $output ??= new ConsoleOutput();
        $this->theme      = $theme ??= new DefaultTheme();
        $this->terminal   = new Terminal();
        $this->shortcodes = new Shortcodes($this->theme);
    }

    /**
     * Set output interface.
     *
     * @param OutputInterface $output Output interface.
     *
     * @return self Returns instance of the Termage class.
     *
     * @access public
     */
    public function output(OutputInterface $output): self
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Get output interface.
     *
     * @return OutputInterface Returns output interface.
     *
     * @access public
     */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * Get Shortcodes instance.
     *
     * @return Shortcodes Shortcodes instance.
     *
     * @access public
     */
    public function getShortcodes(): Shortcodes
    {
        return $this->shortcodes;
    }

    /**
     * Get terminal instance.
     *
     * @return Terminal Returns terminal instance.
     *
     * @access public
     */
    public function getTerminal(): Terminal
    {
        return $this->terminal;
    }

    /**
     * Get instance of the Theme class.
     *
     * @return self Returns instance of the Theme class.
     *
     * @access public
     */
    public function getTheme(): Theme
    {
        return $this->theme;
    }

    /**
     * Set a new instance of the Theme class.
     *
     * @param Theme $theme Instance of the Theme class.
     *
     * @return self Returns instance of the Termage class.
     *
     * @access public
     */
    public function theme(Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Create a new El Component instance.
     *
     * @param string $value      Element value.
     * @param array  $properties Element properties.
     *
     * @return Block Returns El Component instance.
     *
     * @access public
     */
    public function el(string $value = '', array $properties = []): El
    {
        return new El(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }

    /**
     * Create a new Emoji Component instance.
     *
     * @param string $value      Emoji value.
     * @param array  $properties Emoji properties.
     *
     * @return Emoji Returns Emoji Component instance.
     *
     * @access public
     */
    public function emoji(string $value = '', array $properties = []): Emoji
    {
        return new Emoji(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }

    /**
     * Create a new Alert Component instance.
     *
     * @param string $value      Alert value.
     * @param array  $properties Alert properties.
     *
     * @return Alert Returns Alert Component instance.
     *
     * @access public
     */
    public function alert(string $value = '', array $properties = []): Alert
    {
        return new Alert(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }

    /**
     * Create a new Rule Component instance.
     *
     * @param string $value      Rule value.
     * @param array  $properties Rule properties.
     *
     * @return Rule Returns Rule Component instance.
     *
     * @access public
     */
    public function rule(string $value = '', array $properties = []): Rule
    {
        return new Rule(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }

    /**
     * Create a new Link Component instance.
     *
     * @param string $value      Link value.
     * @param array  $properties Link properties.
     *
     * @return Link Returns Link Component instance.
     *
     * @access public
     */
    public function link(string $value = '', array $properties = []): Link
    {
        return new Link(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }

    /**
     * Create a new Chart Component instance.
     *
     * @param string $value      Chart value.
     * @param array  $properties Chart properties.
     *
     * @return Chart Returns Chart Component instance.
     *
     * @access public
     */
    public function chart(string $value = '', array $properties = []): Chart
    {
        return new Chart(
            $this->output,
            $this->theme,
            $this->shortcodes,
            $value,
            $properties
        );
    }
}
