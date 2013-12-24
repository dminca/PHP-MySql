PHP-MySql
=========

<h3 style="color: red;">** COMENZI GIT (instructiuni de utilizare) **</h3>

>Comenzile Git sunt accesate din executabilul Github instalat pe Windows 7 (spre exemplu), dupa ce-ati clonat repo-ul (proiectul). Intrati in proiect din Github, apoi sus aveti un meniu <b>Tools and options</b> apoi <b>Open a shell here</b> si bagati comenzile care trebuie.

<b>git init</b> - initialise repository

-----------------

<b>git status</b> - see how the repository status has changed

-----------------

<b>git add octocat.txt</b> - To tell Git to start tracking changes

  <b>git status</b>
  
-----------------

<b>git commit -m "Add cute octocat story"</b> - To store our staged changes we run the commit command with a message describing what we've changed

-----------------

<b>git add '*.txt'</b> - we can add all the new files using a wildcard with git add. Don't forget the quotes!

-----------------

<b>git log</b> - Git's log as a journal that remembers all the changes we've committed so far, in the order we committed them

-----------------

<b>git remote add origin https://github.com/try-git/try_git.git</b> - To push our local repo to the GitHub server we'll need to add a remote repository. This command takes a remote name and a repository URL

-----------------

<b>git push -u origin master</b> - The push command tells Git where to put our commits when we're ready. The name of our remote is <b>origin</b> and the default local branch name is <b>master</b>. The <b> -u</b> tells Git to remember the parameters, so that next time we can simply run <i>git</i> push and Git will know what to do

-----------------

<b>git pull origin master</b> - We've invited other people to our github project who have pulled your changes, made their own commits, and pushed them. We can check for changes on our GitHub repository and pull down any new changes by running this command.

-----------------

<b>git diff HEAD</b> - Let's take a look at what is different from our last commit by using the git diff command. In this case we want the diff of our most recent commit, which we can refer to using the <b>HEAD</b> pointer.

-----------------

<b>git diff --staged</b> - run git diff with the <b>--staged</b> option to see the changes you just staged. (<b>staged</b> files are files we have told git that are ready to be committed.)

-----------------

<b>git reset octofamily/octodog.txt</b> - You can <b>unstage</b> files by using the git reset command.

-----------------

<b>git checkout -- octocat.txt</b> - Files can be changed back to how they were at the last commit by using the command: <b>git checkout -- <target> </b>.

-----------------

<b>git branch clean_up</b> - When developers are working on a feature or bug they'll often create a copy (aka. branch) of their code they can make separate commits to. Then when they're done they can merge this branch back into their main master branch. We want to remove all these pesky octocats, so let's create a branch called <i>clean_up</i>, where we'll do all the work.
if you type <b>git branch</b> you'll see two local branches: a main branch named <i>master</i> and your new branch named <i>clean_up</i>.

-----------------

<b>git checkout clean_up</b> - You can switch branches using the <i>git checkout <branch> </i> command. Try it now to switch to the clean_up branch.

-----------------

<b>git rm '*.txt'</b> - by using the git rm command which will not only remove the actual files from disk, but will also stage the removal of the files for us. 

-----------------

Now that you've removed all the cats you'll need to commit your changes.
run <i>git status</i> to check the changes you're about to commit.
<b>git commit -m "Remove all the cats"</b> - to commit your changes.

-----------------

just need to switch back to the master branch so you can copy (or merge) your changes from the clean_up branch back into the master branch.
<b>git checkout master</b> - checkout the master branch

-----------------

<b>git merge clean_up</b> - We're already on the master branch, so we just need to tell Git to merge the clean_up branch into it

-----------------

Since you're done with the clean_up branch you don't need it anymore.
<b>git branch -d clean_up</b> - You can use git branch -d <branch name> to delete a branch

-----------------

<b>git push</b> - push everything you've been working on to your remote repository, and you're done!
