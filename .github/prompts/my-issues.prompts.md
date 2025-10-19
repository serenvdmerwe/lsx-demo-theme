---
mode: 'agent'
tools: ['githubRepo', 'github', 'get_issue', 'get_issue_comments', 'get_me', 'list_issues']
description: 'List my issues in the current repository'
license: 'GPL-3.0'
---

Search the current repo (using #githubRepo for the repo info) and list any issues you find (using #list_issues) that are assigned to me.

Suggest issues that I might want to focus on based on their age, the amount of comments, and their status (open/closed).
