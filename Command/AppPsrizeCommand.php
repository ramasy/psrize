<?php

namespace Ramasy\PsrizeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class AppPsrizeCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('app:psrize')
            ->setDescription('Test if your code follows psr-2 standard')
            ->addArgument('path', InputArgument::REQUIRED, 'Path to the foder')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $racine = $this->getContainer()->get('kernel')->getRootDir() .'/../src/';
        $bin = $this->getContainer()->get('kernel')->getRootDir() .'/../vendor/bin/';
        $path_option = $input->getArgument('path') . "/";
        $full_path = $racine . $path_option;
        $full_path = preg_replace('/\//', DIRECTORY_SEPARATOR, $full_path);
        if (!is_dir($full_path)) {
            $output->writeln("<error> /!\ Unable to find " . $full_path . " directory </error>");
            return;
        }
        $list_file = array_diff(scandir($full_path), array('.', '..'));
        $numFichier = 0;
        $listeCommande = array(
            'codesize' => 'text codesize',
            'naming' => 'text naming',
            'unusedcode' => 'text unusedcode',
            'design' => 'text design',
        );
        foreach ($list_file as $nomFichier) {
            if (preg_match('/.php$/', $nomFichier)) {
                $numFichier ++;
                $helper = $this->getHelper('question');
                $question = new ConfirmationQuestion('File [' . $numFichier . '/' . sizeOf($list_file) . ']: ' .$nomFichier. '?(y/N)', false);
                if ($helper->ask($input, $output, $question)) {
                    $str_commande_cs = $bin . "phpcbf -n --colors --standard=PSR2 \"" . $full_path . $nomFichier . "\"";
                    $output->writeln("<info>psrize - " . $nomFichier . "</info>");
                    system($str_commande_cs, $retval);
                    foreach ($listeCommande as $designationCommande => $commande) {
                        $str_commande = $bin . "phpmd \"" . $full_path . $nomFichier . "\" " . $commande;
                        $output->writeln("<info>==>" . $designationCommande . "</info>");
                        system($str_commande, $retval);
                        print PHP_EOL;
                    }
                }
            }
        }
    }
}
